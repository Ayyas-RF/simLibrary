<?php include "layout.php"; ?>

<div class="greetings">
    <?php foreach ($data["greetings"] as $greeting): ?>
        <p><?= $greeting ?></p>
    <?php endforeach; ?>
</div>
<div class="recommendations">
    <h2>Recommended Books</h2>
    <ul>
        <?php foreach ($data["recommendedBooks"] as $book): ?>
            <li><?= $book["title"] ?> by <?= $book["author"] ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<button class="button" onclick="toggleSidebar()">Search Books</button>

<div id="sidebar" class="sidebar">
    <div class="sidebar-content">
        <button class="close-btn" onclick="toggleSidebar()">×</button>
        <h3>Search Books</h3>
        <form action="search_books.php" method="GET">
            <input type="text" name="query" placeholder="By title or author..." required>
            <button type="submit">Search</button>
        </form>
        <div id="search-results"></div>
    </div>
</div>

<footer>
  <p>&copy; <?= date("Y") ?> SimLibrary</p>
</footer>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
}

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    const query = event.target.query.value;

    fetch(`search_books.php?query=${query}`)
        .then(response => response.json())
        .then(data => {
            const resultsContainer = document.getElementById('search-results');
            resultsContainer.innerHTML = '';

            if (data.length > 0) {
                data.forEach(book => {
                    const resultItem = document.createElement('div');
                    resultItem.textContent = `${book.title} by ${book.author}`;
                    resultsContainer.appendChild(resultItem);
                });
            } else {
                resultsContainer.innerHTML = 'No books found';
            }
        });
});
</script>