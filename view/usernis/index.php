<script>
    $(document).ready(function() {
        $(".delete").click(function() {
            if (window.confirm("Tem certeza que deseja excluir este registro?")) {
                window.location = "index.php?usernis=destroy&id=" + this.dataset.value;
            }
        });
        <?php if (isset($data['sucesso'])) {
                echo 'alert("Cadastro realizado com sucesso! Gerado o NIS: ' . $data['sucesso'] . '");';
        }?>
    });
</script>

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Cidadãos Cadastrados</h2>
                </div>
                <div class="col-sm-6">
                    <a href="index.php?usernis=create" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Cadastrar Novo Cidadão</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>NIS</th>
                </tr>
            </thead>
            <tbody>
                <?php $usersNis = $data['usernis']; ?>
                <?php foreach ($usersNis as $userNis) : ?>
                    <tr>
                        <td nowrap class="text-captalize"><?= $userNis->getName(); ?></td>
                        <td nowrap><?php echo $userNis->getNis(); ?></td>
                        <td align="right">
                            <a href="#" class="delete" data-value="<?= $userNis->getId() ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>