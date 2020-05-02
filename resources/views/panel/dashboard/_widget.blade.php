<style>
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px 0px 15px 0px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.primary {
        background-color: #007bff;
        color: #FFF;
    }

    .card-counter.danger {
        background-color: #ef5350;
        color: #FFF;
    }

    .card-counter.success {
        background-color: #66bb6a;
        color: #FFF;
    }

    .card-counter.info {
        background-color: #26c6da;
        color: #FFF;
    }

    .card-counter i {
        font-size: 5em;
        opacity: 0.2;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 32px;
        display: block;
    }

    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }
</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card-counter primary">
            <i class="fa fa-code-fork"></i>
            <span class="count-numbers">12</span>
            <span class="count-name">Turnos hoy día</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card-counter danger">
            <i class="fa fa-ticket"></i>
            <span class="count-numbers">599</span>
            <span class="count-name">Futuros turnos</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card-counter success">
            <i class="fa fa-database"></i>
            <span class="count-numbers">{{ $countPatient }}</span>
            <span class="count-name">Mascotas</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card-counter info">
            <i class="fa fa-users"></i>
            <span class="count-numbers">{{ $countCustomer }}</span>
            <span class="count-name">clientes</span>
        </div>
    </div>
</div>