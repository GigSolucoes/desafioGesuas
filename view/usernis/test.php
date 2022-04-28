<script>
    $(document).ready(function() {
        var contaInvalidos = 0;
        function validatePisPasep(pis) {
            pis = pis.replace(/\D/g, "");
            if (pis.length !== 11) {
                contaInvalidos++;
                return '<i class="material-icons text-danger" data-toggle="tooltip" title="Válido">&#xe888;</i>';
            }
            const last = window.sessionStorage.getItem("nv-session-validate-pis-pasep");
            if (last !== pis) {
                window.sessionStorage.setItem("nv-session-validate-pis-pasep", pis);
            }
            const arrNumbers = pis.split("");
            const n1 = parseInt(arrNumbers[0]) * 3;
            const n2 = parseInt(arrNumbers[1]) * 2;
            const n3 = parseInt(arrNumbers[2]) * 9;
            const n4 = parseInt(arrNumbers[3]) * 8;
            const n5 = parseInt(arrNumbers[4]) * 7;
            const n6 = parseInt(arrNumbers[5]) * 6;
            const n7 = parseInt(arrNumbers[6]) * 5;
            const n8 = parseInt(arrNumbers[7]) * 4;
            const n9 = parseInt(arrNumbers[8]) * 3;
            const n10 = parseInt(arrNumbers[9]) * 2;
            const sum = n1 + n2 + n3 + n4 + n5 + n6 + n7 + n8 + n9 + n10;
            let digit = 11 - (sum % 11);
            if (digit === 10 || digit === 11) {
                digit = 0;
            }
            if(parseInt(arrNumbers[10]) === digit){
                return '<i class="material-icons text-success" data-toggle="tooltip" title="Válido">&#xe876;</i>';
            }
            contaInvalidos++;
            return '<i class="material-icons text-danger" data-toggle="tooltip" title="Válido">&#xe888;</i>';
        }
        $(".btn-validar").click(function() {
            $(".btn-validar").html('Validando...');
            $(".btn-validar").attr('disabled', true);
            $(".btn-gerar").attr('disabled', true);
            setTimeout(function(){
                var elements = document.getElementsByClassName('testValidate');
                var dataRepeat = []
                for(var i = 0; i < elements.length; i++){
                    elements[i].innerHTML = validatePisPasep(elements[i].dataset.nis);
                    dataRepeat.push(elements[i].dataset.nis);
                };
                const filterRepeat = [...new Set(dataRepeat)];
                const repeats = elements.length - filterRepeat.length;

                $(".btn-validar").html('Validar');
                $(".btn-validar").attr('disabled', false);
                $(".btn-gerar").attr('disabled', false);
                alert(elements.length + ' REGISTROS GERADOS;\n' + contaInvalidos + ' INVÁLIDOS\n' + repeats + ' REGISTROS ESTÃO DUPLICADOS');
                console.log(elements.length + ' REGISTROS GERADOS;\n' + contaInvalidos + ' INVÁLIDOS\n' + repeats + ' REGISTROS ESTÃO DUPLICADOS');
            }, 1000)
        });
    });
</script>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-3">
                    <h2>Testar e Validar</h2>
                </div>
                <div class="col-sm-9">
                    <form class="form-horizontal" method="post" action="index.php?usernis=test">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="size" placeholder="Núm. de registros" name="size">
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary btn-form bg-danger btn-validar">
                                    Validar
                                </button>
                                <button type="submit" class="btn btn-primary btn-form bg-success btn-gerar">
                                    Gerar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if(count($data) > 0){
            $nisTests = $data['results'];
        ?>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nis</th>
                    <th>Condição</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nisTests as $nisTest) : ?>
                    <tr>
                        <td nowrap class="text-capitalize"><?= $nisTest; ?></td>
                        <td nowrap class="testValidate" data-nis="<?= $nisTest; ?>">...</td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php }?>
    </div>
</div>