<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de estudiantes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">habilitados</h3>
              </div>
              <h1><?php
              //date_default_timezone_set('America/la_paz');
              echo date('y/m/d H:i:s'); ?>--hora actualizada</h1>
              
              <div>   
                <a href="<?php echo base_url(); ?>index.php/estudiante/agregar"> <button type="button" class="btn btn-primary">AGREGAR ESTUDIANTES</button> </a>
                <a href="<?php echo base_url(); ?>index.php/estudiante/deshabilitados"> <button type="button" class="btn btn-warning">VER LISTA DE ESTUDIANTES DESHABILITADOS</button> </a>
                <a href="<?php echo base_url(); ?>index.php/usuarios/logout"> <button type="button" class="btn btn-danger">CERRAR SESION</button> </a>
              </div>
              
              <h3> 
                login:<?php  echo $this ->session->userdata('login');?><br>
                id:   <?php  echo $this ->session->userdata('idusuario');?><br>
                tipo: <?php  echo $this ->session->userdata('tipo');?><br>
              </h3>


 <!-- <a href ="<?php echo base_url();?>index.php/estudiante/listapdf" target="_blank"><button type="submit" class="btn btn-success btn-block">lista de estudiante en pdf</button>   </a>  -->
 
 
 
           
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td>no</td>
                      <td>NOMBRE</td>
                      <td>FECHA DE REGISTRO</td>
                      <td>PRIMER APELLIDO</td>
                      <td>SEGUNDO APELLIDO</td>
                      <td>CARRERA</td>
                      <td>FECHA DE NACIMIENTO</td>
                      
                      <td>DIRECCION</td>
                      <td>MODIFICAR</td>
                      <td>ELIMINAR</td>
                      <td>DESHABILITAR</td>
                      <td>FOTO</td>
                              
                    </tr>
                  </thead>
                  <tbody>
                 
                    <?php
                      $indice = 1;
                      foreach ($estudiante->result() as  $row) 
                      {
                    ?>
                        <tr>
                            <td> <?php echo $indice; ?> </td>
                            <td> <?php echo $row->nombre; ?> </td>
                           
                            <td> <?php echo formatearFecha($row->fechaRegistro); ?> </td>
                            <td> <?php echo $row->primerApellido; ?> </td>
                            <td> <?php echo $row->segundoApellido; ?> </td>
                            <td> <?php echo $row->carrera; ?> </td>
                            <td> <?php echo $row->fechaNacimiento; ?></td>
                           
                            <td> <?php echo $row->direccion; ?></td>
                            <td>
                              <?php
                                echo form_open_multipart('estudiante/modificar')
                              ?>
                                <input type="hidden" name="idestudiante" value="<?php echo $row->id; ?> ">
                                <button type="submit" class="btn btn-success">MODIFICAR</button>
                              <?php
                                echo form_close();
                              ?>
                            </td>

                            <td>

                                <?php
                                echo form_open_multipart('estudiante/eliminarbd')
                                ?>
                                <input type="hidden" name="idestudiante" value="<?php echo $row->id; ?> ">
                                <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                <?php
                                echo form_close();
                                ?>
                            </td>
                            <td>

                                <?php
                                echo form_open_multipart('estudiante/deshabilitarbd')
                                ?>
                                <input type="hidden" name="idestudiante" value="<?php echo $row->id; ?> ">
                                <button type="submit" class="btn btn-warning">DESHABILITAR</button>
                                <?php
                                echo form_close();
                                ?>
                            </td>
                            
                            
                            <td>
                              <?php
                              $foto=$row->foto;
                              if($foto=="")
                                {
                              ?>
                              <img width="100" src="<?php echo base_url(); ?>uploads/empleados/perfil.jpg">
                              <?php
                                }
                              else
                                {
                              ?>
                              <img width="100" src="<?php echo base_url(); ?>uploads/empleados/<?php echo $foto; ?>">
                              <?php
                                }
                              ?> 
                              
                              
                              <?php
                                echo form_open_multipart('estudiante/subirfoto')
                                ?>
                                <input type="hidden" name="idestudiante" value="<?php echo $row->id; ?>">
                                <button type="submit" class="btn btn-primary">SUBIR</button>
                                <?php
                                echo form_close();
                              ?>  
                            </td>
                        </tr>

                    <?php
                      $indice++;
                      }
                    ?>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                      <td>no</td>
                      <td>NOMBRE</td>
                      <td>FECHA DE REGISTRO</td>
                      <td>PRIMER APELLIDO</td>
                      <td>SEGUNDO APELLIDO</td>
                      <td>CARRERA</td>
                      <td>FECHA DE NACIMIENTO</td>
                      
                      <td>DIRECCION</td>
                      <td>MODIFICAR</td>
                      <td>ELIMINAR</td>
                      <td>DESHABILITAR</td>
                      <td>FOTO</td>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
