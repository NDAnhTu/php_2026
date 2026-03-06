<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-black-500 underline margin-bottom-10">
            Get back...
        </a>
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>
        <footer class="mt-6">
            <a href="/notes/edit?id=<?= $note['id'] ?>" class="bg-blue-500 text-white px-4 py-2 rounded">
                Edit
            </a>
        </footer>
        <form method="POST" action="/notes/destroy">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="bg-red-500 text-white px-4 py-2 rounded" type="submit">
                Delete
            </button>
        </form>
    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>