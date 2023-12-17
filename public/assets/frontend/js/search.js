
    document.getElementById('searchInput').addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            performSearch();
        }
    });

    function performSearch() {
        var searchTerm = document.getElementById('searchInput').value;

        // Make an AJAX request to the Laravel backend
        axios.get('/search', {
            params: { q: searchTerm }
        })
        .then(function (response) {
            // Redirect to the search results page
            window.location.href = '/search?q=' + encodeURIComponent(searchTerm);
        })
        .catch(function (error) {
            console.error('Error during search:', error);
        });
    }

