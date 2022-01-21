<main class="content">
    <?php

        setlocale(LC_TIME, 'pt-BR.uft-8');

        renderTittle(
            'Registrar Ponto',
            'Mantenha seu ponto consistente!',
            'icofont-check-alt'
        );
        include(TEMPLATE_PATH . '/messages.php');

    ?>
    <div class="card">
        <div class="card-header">
            <form action="#" method="post" class="mt-2 mb-3">
                <div class="form-inline no-border">
                    <input type="date" name="pointdate" id="pointdate" class="datepicker form-control col-2"
                            value="<?= $_POST['pointdate'] ? $_POST['pointdate'] : $today ?>">
                    <button type="submit" class="btn btn-secondary btn-lg ml-2">Buscar Data</button>
                </div>
            </form>
            
            <h3><?= $_POST['pointdate'] ? (strftime('%A, %d de %B de %Y', strtotime($_POST['pointdate']))) : $today ?></h3>
            <p class="mb-0">Batimento efetuados no dia selecionado</p>
        </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 1: <?= $timesSelectedDay->time1 ?? '---' ?></span>
                <span class="record">Saída 1: <?= $timesSelectedDay->time2 ?? '---' ?></span>
            </div>
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 2: <?= $timesSelectedDay->time3 ?? '---' ?></span>
                <span class="record">Saída 2: <?= $timesSelectedDay->time4 ?? '---' ?></span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="innout.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Bater o Ponto
            </a>
        </div>
    </div>
    
    <?php if($user->is_admin): ?>
    <form class="mt-5" action="innout.php" method="post">
        <div class="input-group no-border">
            <input class="form-control" type="text"
                name="forcedTime"
                id="forcedTime"
                placeholder="Informe a hora para simular o batimento">
            <button class="btn btn-danger ml-3">
                Simular Ponto
            </button>
        </div>
    </form>
    <?php endif ?>
</main>