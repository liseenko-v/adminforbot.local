<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
</style>
<link href="../assets/dashboard.css" rel="stylesheet">
    
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/">Bot Adminer</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Выход</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4">
      <h2>Измение тарифа пользователя</h2>
      <a href="index.php" class="btn btn-success">Назад</a>
      <hr>
      <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12">
            <?php if (isset($data['status'])) {?>
            <div class="alert alert-success">
                <?php echo $data['status']; ?>
            </div>
            <?php } ?>
            <?php if (isset($data['error'])) {?>
            <div class="alert alert-danger">
                <?php echo $data['error']; ?>
            </div>
            <?php } ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $data['user']['nickname'] != '' ? $data['user']['nickname'] : 'NICKNAME не указан' ;?></h5>
                    <h6 class="card-subtitle mb-2">TELEGRAM ID: <b><?php echo $data['user']['tg_id'];?></b></h6>
                    <h6 class="card-subtitle mb-2">Действие подписки: <b><?php echo date('Y-m-d H:i:s', $data['user']['time_sub']);?></b></h6>
                    <h6 class="card-subtitle mb-2">Количество запросов: <b><?php echo $data['user']['crequests'];?></b></h6>
                    <h6 class="card-subtitle mb-2">Активный тариф: <b><?php echo $data['user']['tarification'];?></b></h6>
                    <p class="card-text"></p>
                </div>
            </div>
            <hr>
            <form action="change_user_rate.php?id=<?php echo $data['user']['id']; ?>" method="POST">        
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Тариф</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="rate" required>
                        <option value="">Выбрать тариф</option>
                        <?php foreach($data['rates'] as $item) {?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['description']?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name="user" value="<?php echo $data['user']['id']?>">
                <button type="submit" name="submit" class="btn btn-primary mb-2">Изменить тариф</button>

            </form>
        </div>
      </div>      

    </main>
  </div>
</div>