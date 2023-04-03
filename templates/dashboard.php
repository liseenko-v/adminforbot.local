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
      <h2>Users</h2>
      <hr>
      <div class="table-responsive">
        <table id="tbl" class="display table table-striped table-hover" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>TELEGRAM ID</th>
                    <th>NICKNAME</th>
                    <th>Тариф</th>
                    <th>Действие подписки</th>
                    <th>Кол-во запросов</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['users'] as $item) { ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['tg_id']; ?></td>
                    <td><?php echo $item['nickname']; ?></td>
                    <td><?php echo $item['tarification']; ?></td>                    
                    <td><?php echo date('Y-m-d H:i:s', $item['time_sub']); ?></td>
                    <td><?php echo $item['crequests']; ?></td>
                    <td><a href="/change_user_rate.php?id=<?php echo $item['id'];?>" alt="Изменить тариф" title="Изменить тариф"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
  <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
</svg></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>        
<script>
    $(document).ready(function () {
        $('#tbl').DataTable({
            "order": [],
			"pageLength": 50,			
        });
    });
</script>