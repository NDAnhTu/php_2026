<?php require(__DIR__ . "/../partials/head.php") ?>
<?php require(__DIR__ . "/../partials/nav.php") ?>
<?php require(__DIR__ . "/../partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Create Note</h1>
        <form method="POST">
            <div class="mb-4">
                <label for="body" class="block text-gray-700 font-bold mb-2">Note Body:</label>
                <textarea name="body" id="body" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required placeholder="This is a sample note body...">
                    <?= isset($_POST['body']) ? htmlspecialchars($_POST['body']) : '' ?>
                </textarea>
            </div>
            <?php if (isset($errors['body'])): ?>
                <p class="text-red-500 text-xl italic mb-4"><?php echo $errors['body']; ?></p>
            <?php endif; ?>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Note</button>
        </form>
    </div>
</main>

<?php require(__DIR__ . "/../partials/footer.php") ?>