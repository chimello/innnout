<main class="content">
    <?php

        setlocale(LC_TIME, 'pt-BR.uft-8');

        renderTittle(
            'Alterar Ponto',
            'Mantenha seu ponto correto',
            'icofont-clock-time'
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
            <form action="change_registry.php" method="post">
                <div class="d-flex m-5 justify-content-around">
                    <div class="form">
                        <label class="record" for="altertime1">Entrada 1:</label>
                        <input type="time" name="altertime1" id="altertime1" class="record ml-2"
                                value="<?= $timesSelectedDay->time1 ?? '---' ?>">
                    </div>
                    <div class="form">
                        <label class="record" for="altertime2">Saída 1:</label>
                        <input type="time" name="altertime2" id="altertime2" class="record ml-2"
                                value="<?= $timesSelectedDay->time2 ?? '---' ?>">
                    </div>
                </div>
                <div class="d-flex m-5 justify-content-around">
                <div class="form">
                        <label class="record" for="altertime3">Entrada 2:</label>
                        <input type="time" name="altertime3" id="altertime3" class="record ml-2"
                                value="<?= $timesSelectedDay->time3 ?? '---' ?>">
                    </div>
                    <div class="form">
                        <label class="record" for="altertime4">Saída 2:</label>
                        <input type="time" name="altertime4" id="altertime4" class="record ml-2"
                                value="<?= $timesSelectedDay->time4 ?? '---' ?>">
                    </div>
                </div>
                <input type="hidden" name="pointdate" id="pointdate" value="<?= $_POST['pointdate'] ? $_POST['pointdate'] : $today ?>">

                <button type="submit" class="btn btn-secondary btn-lg ml-2">
                    Alterar Ponto
                </button>
            </form>
        </div>
        
    </div>
</main>