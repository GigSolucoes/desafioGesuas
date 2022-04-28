<script>
    $(document).ready(function() {
        function maskNis(v) {
            v = v.replace(/\D/g, "")
            v = v.replace(/^(\d{3})(\d)/, "$1.$2")
            v = v.replace(/^(\d{3})\.(\d{4})(\d)/, "$1.$2.$3")
            v = v.replace(/(\d{3})\.(\d{4})\.(\d{3})(\d)/, "$1.$2.$3-$4")
            return v
        }
        $("#nis").keyup(function() {
            $("#nis").val(maskNis($("#nis").val()));
        });
    });
</script>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-3">
                    <h2>Pesquisa</h2>
                </div>
                <div class="col-sm-9">
                    <form class="form-horizontal" method="post" action="index.php?usernis=search">
                        <div class="row">
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="nis" placeholder="Informe o NIS" name="nis">
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary btn-form">
                                    <i class="material-icons" data-toggle="tooltip" title="Search">&#xe8b6;</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if(count($data) > 0){?>
        <?php if(isset($data['results']) && $data['results'] == 1){ ?>
        <?php $usersNis = $data['usernis']; ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>NIS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersNis as $userNis) : ?>
                    <tr>
                        <td nowrap class="text-capitalize"><?= $userNis->getName(); ?></td>
                        <td nowrap><?= $userNis->getNis(); ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php }else{?>
        CIDADÃO NÃO ENCONTRADO
        <?php }}?>
    </div>
</div>