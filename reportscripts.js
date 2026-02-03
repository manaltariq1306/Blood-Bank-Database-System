function fetchReport(endpoint, reportType) {
    if (!reportType && endpoint.includes('reports.php')) return;

    const url = `${endpoint}?report=${reportType}`;
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById('report-container').innerHTML = data;
        })
        .catch(error => console.error('Error fetching report:', error));
}