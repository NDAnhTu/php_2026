<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Edit Note</h1>
        <form method="POST" action="/notes/update">
            <div class="mb-4">
                <label for="body" class="block text-gray-700 font-bold mb-2">Note Body:</label>
                <textarea name="body" id="body" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required placeholder="This is a sample note body..."><?= $note['body'] ?? '' ?></textarea>
            </div>
            <?php if (isset($errors['body'])): ?>
                <p class="text-red-500 text-xl italic mb-4"><?php echo $errors['body']; ?></p>
            <?php endif; ?>
            <a href="/note?id=<?= $note['id'] ?>">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            </a>
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Note</button>
        </form>
    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>