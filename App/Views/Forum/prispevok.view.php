<?php ?>
<div class="zaklad modrePozadie">
    <div class="nadpis">
        <h1 id="nadpisPrispevku"></h1>
    </div>
    <div>
        <div class="text">
            <p id="textPrispevku"></p>
        </div>
        <div class="row d-flex mt-100 mb-100">
            <div class="col-lg-6">
                <form method="post">
                    <div class="form-group">
                        <textarea name="odpoved" id="odpoved" class="form-control" rows="1"
                                  placeholder="Zadajte odpoveď" required></textarea>
                        <input class="btn btn-primary" type="submit" id="odoslatOdpoved" name="submit" value="Odoslať">
                        <input class="hidden" id="idPrispevku" name="idPrispevku">
                    </div>
                </form>
                <div class="card cardComments">
                    <div class="card-body text-center odpovedeNadpis">
                        <h4 class="card-title">Odpovede</h4>
                    </div>
                    <div class="comment-widgets"></div>
                </div>
            </div>
        </div>
    </div>
</div>