<script>
    $(document).ready(function() {
        var elements = document.getElementsByClassName('alert');
        if(elements.length > 0){
            setTimeout(function(){
                for (let i = 0; i < elements.length; i++) {
                    elements[i].parentNode.removeChild(elements[i]);
                }
            }, 5000);
        }
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 offset-md-2">
                <?php if (isset($data['errors'])) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '<ul>';
                    foreach ($data['errors'] as $error) {
                        echo '<li>' . $error . '</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }
                if (isset($data['success'])) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<ul>';
                    foreach ($data['success'] as $success) {
                        echo '<li>' . $success . '</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }
                ?>
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Cadastrar Novo Cidadão</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="index.php?usernis=store">
                            <div class="align-middle">
                                <div class="align-middle">
                                    <div class="form-group align-middle">
                                        <label class="control-label col-sm-2" for="name">Nome:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control text-captalize" id="name" placeholder="Nome do cidadão" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-form">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>