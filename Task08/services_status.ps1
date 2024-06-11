get-service | foreach-object {
    if ($_.Status -eq "Running") {
        Write-Host $_.Name -ForegroundColor Green
    }
    if ($_.Status -eq "Stopped") {
        Write-Host $_.Name -ForegroundColor Red
    }
}