<body>
    <div class="container">
        <h1>Ma liste de tâches</h1>
        <ul id="todo-list" class="list-group mb-4">

            <?php foreach ($todos as $todo): ?>
            <li class="list-group-item">

                <?php if(<?= $todo->GetDescription() ?>): ?>
                    <del class="text-muted">
                        <?= $todo['description'] ?>
                    </del>
                <?php else: ?>
                    <?= $todo->GetDescription() ?>
                <?php endif; ?>

            </li>
            <?php endforeach; ?>

        </ul>
        <form id="add-todo" class="d-flex" method="post">
            <input id="<?= $todo->getId() ?>" name="description" class="form-control" type="text" placeholder="Entrez une nouvelle tâche" />
            <button type="submit" id="add-todo-button" class="btn btn-success">Ajouter</button>
        </form>
    </div>
</body>