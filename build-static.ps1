# build-static.ps1
# Script to build static HTML from Laravel dev server for GitHub Pages

$url = "http://127.0.0.1:8000"
$outputFolder = Join-Path $PSScriptRoot "docs"

Write-Host "Creating output folder: $outputFolder"
if (!(Test-Path $outputFolder)) {
    New-Item -ItemType Directory -Path $outputFolder -Force | Out-Null
}

Write-Host "Fetching HTML from $url..."
try {
    $response = Invoke-WebRequest -Uri "$url/" -UseBasicParsing
    $html = $response.Content
} catch {
    Write-Error "Failed to fetch from $url. Please make sure the Laravel dev server is running on port 8000."
    exit 1
}

Write-Host "Replacing absolute paths with relative paths..."
# Replace localhost base URLs
$html = $html -replace "http://127.0.0.1:8000", ""
$html = $html -replace "http://127.0.0.1:8001", ""

# Replace leading slash absolute paths in href, src, action
$html = $html -replace 'href="/css/', 'href="css/'
$html = $html -replace 'src="/images/', 'src="images/'
$html = $html -replace 'url\(\x27/images/', 'url(\x27images/'
$html = $html -replace 'url\("/images/', 'url("images/'
$html = $html -replace 'url\(/images/', 'url(images/'

# Fix navigation absolute hash links like /#projects or /#about to #projects or #about
$html = $html -replace 'href="/#', 'href="#'

# Replaces any other stray absolute paths to static assets
$html = $html -replace 'href="/', 'href="'
$html = $html -replace 'src="/', 'src="'

# Since GitHub Pages does not support PHP/POST, we should make the contact form action a hash or a standard external redirect/mail handler if needed,
# or we can keep it as is, but changing it to action="#" or action="https://formspree.io/..." or action="#contact" is clean. Let's make it action="#" so it does not error.
$html = $html -replace 'action="[^"]*contact[^"]*"', 'action="#contact"'

# Save index.html
$outputPath = Join-Path $outputFolder "index.html"
Set-Content -Path $outputPath -Value $html -Encoding utf8
Write-Host "Saved index.html to $outputPath"

# Copy assets
Write-Host "Copying assets (css, images)..."
$cssSource = Join-Path $PSScriptRoot "public/css"
if (Test-Path $cssSource) {
    if (Test-Path (Join-Path $outputFolder "css")) {
        Remove-Item -Path (Join-Path $outputFolder "css") -Recurse -Force | Out-Null
    }
    Copy-Item -Path $cssSource -Destination $outputFolder -Recurse -Force | Out-Null
    Write-Host "Copied CSS assets."
}

$imagesSource = Join-Path $PSScriptRoot "public/images"
if (Test-Path $imagesSource) {
    if (Test-Path (Join-Path $outputFolder "images")) {
        Remove-Item -Path (Join-Path $outputFolder "images") -Recurse -Force | Out-Null
    }
    Copy-Item -Path $imagesSource -Destination $outputFolder -Recurse -Force | Out-Null
    Write-Host "Copied image assets."
}

# Add a .nojekyll file to prevent GitHub Pages from ignoring folders starting with underscore
New-Item -ItemType File -Path (Join-Path $outputFolder ".nojekyll") -Force | Out-Null
Write-Host "Created .nojekyll file."

Write-Host "Build complete! Static site generated in docs/ folder."
