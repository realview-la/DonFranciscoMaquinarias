
<div class="container-fluid imgFront">
  <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12 center-block">
      <img src="http://donfranciscomaquinarias.com/files/front_don_francisco.jpg" class="img-responsive center-block front" alt="front image">

    </div>
  </div>

</div>

<!-- #featured-cars -->
<div class="container" id="featuredCars">
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-md-12">

      <h4 class="section-title section-line">Maquinarias</h4>
      <ul>

        <?php

        require_once('admin/clase_DB.php');

        $db = new DB();

        $db->conectar();

        $resultados =  $db->consulta('SELECT
          *
          FROM
          vehiculos,imagenes
          WHERE
          vehiculos.id  = imagenes.id_vehiculo AND
          imagenes.portada = "si" AND
          vehiculos.destacado = "si"
          ORDER BY
          vehiculos.id  DESC
          LIMIT 3 ');



          while($row=mysql_fetch_array($resultados)){

            ?>

            <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">

                    <div class="modal-content center-block">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">

                            <div class="col-md-6 center-block">
                              <img src="" class="enlargeImageModalSource imgFeatured">
                            </div>
                            <div class="col-md-6">
                              <h5>
                                <a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>"> <h4 class="title"><?=ucwords($row['model'])?></h4> <h4 class="descrip">Descripción:</h4><?=ucwords($row['note'])?> </a>
                              </h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xs-8 col-md-4 featured">
              <li>
                <div class="col-xs-6 col-md-6">
                  <img src="<?=$row['min_url']?>" class="img-responsive imgFeatured img-rounded" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
                  <span class="zoom-icon"></span>
                </div>
                <div class=" col-xs-6 col-md-6 textFeatured">
                      <h4 class="title"><?=ucwords($row['model'])?></h4>
                      <h5 class="descrip">Descripción:</h5>
                      <h5><?=ucwords($row['note'])?></h5>
                    <a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>">
                    <h5>Ver mas..</h5></a>
                </div>
              </li>
            </div>
          <?php }

          $db->desconectar();

          ?>
        </ul>
      </div>
    </div>
  </div>




  <script type="text/javascript">
  $(function() {
    $('.imgFeatured').on('click', function() {
      $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
      $('#enlargeImageModal').modal('show');
    });
  });
  </script>
  <!-- end - #featured-cars -->
