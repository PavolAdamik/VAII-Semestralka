<?php
include 'header.php';
?>
    <!DOCTYPE html>
    <html lang="en">

<div>
    <div><h1 class="nadpisH1">Suzuky Swift: <button type="button" class="btn btn-success">Prenajať</button>
        </h1>

    </div>
</div>

<div class="kontainer">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.suzuki.sk/automobily/sites/default/files/styles/large/public/2021-02/swift%20sport%20bezpec%203.jpg?itok=Sl03lN8q" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.suzuki.sk/automobily/sites/default/files/styles/full_screen/public/2021-02/swift%20sport%20bezpec.jpg?itok=1Ccfaofe" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.suzuki.sk/automobily/sites/default/files/styles/full_screen/public/2021-02/swift%20sport%20konstr%20copy.jpg?itok=0rrx4NXU" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div>
        <h3 class="nadpisH1">Výbava:</h3>
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h2>Automatická prevodovka</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <!--          <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>-->
                </div>
                <div class="col-md-4">
                    <h2>Tempomat</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <!--          <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>-->
                </div>
                <div class="col-md-4">
                    <h2>Navigacia</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <!--          <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>-->
                </div>

                <div class="col-md-4">
                    <h2>Vyhrievane sedačky</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <!--          <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>-->
                </div>

                <div class="col-md-4">
                    <h2>klimatizácia</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <!--          <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>-->
                </div>

                <div class="col-md-4">
                    <h2>line asist</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <!--          <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>-->
                </div>
            </div>

            <hr>
            <div>
            </div>

        </div>
        <h3 class="nadpisH1">Cenník:</h3>
        <div>
            <table class="table">
                <tr>
                    <th scope="col">Počet dní</th>
                    <td>1-3</td>
                    <td>4-7</td>
                    <td>8-14</td>
                    <td>8-14</td>
                    <td>15-30</td>
                    <td>31+</td>
                </tr>
                <tbody class="table-group-divider">
                <tr>
                    <th scope="row">Cena</th>
                    <td>55&#8364;</td>
                    <td>50&#8364;</td>
                    <td>45&#8364;</td>
                    <td>40&#8364;</td>
                    <td>35&#8364;</td>
                    <td>dohodou</td>
                </tr>

                </tbody>
            </table>
        </div>
        <p>Záloha za vozidlo: 300 &#8364; <button type="button" class="btn btn-success">Prenajať</button></p>
    </div>

</div>
</html>

<?php
include 'footer.php';
?>