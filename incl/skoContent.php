<section class="row skoFix">

  <!-- Venstre side (filter) -->
  <div class="col-xl-2 skoBox center">
    <br />
    <!-- Størrelse -->

    <div class="skoBox2">
      <span>Størrelse</span>
    </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          41
        </label>
          <ul class="simplefilter">
              <li class="active" data-filter="all">All</li>
              <li data-filter="1">Cityscape</li>
      </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          42
        </label>
      </div>
      <br />
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          43
        </label>
      </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          44
        </label>
      </div>
      <br />
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          45
        </label>
      </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          46
        </label>
      </div>
      <br />

      <!-- Farve -->
      <div class="skoBox2">
        <span>Farver</span>
      </div>
      <div class="color-green colorbox">
      </div>
      <div class="color-red colorbox">
      </div>
      <div class="color-yellow colorbox">
      </div>
      <div class="color-white colorbox">
      </div>
      <div class="color-blue colorbox">
      </div>
      <div class="color-purple colorbox">
      </div>
      <div class="color-orange colorbox">
      </div>
      <div class="color-black colorbox">
      </div>
      <div class="color-teal colorbox">
      </div>

      <!-- Type -->
      <div class="skoBox2">
        <span>Type</span>
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
    Sneakers
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Stiletter
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Sandaler
        </label>
      </div>
      <br />

      <!-- Mærker -->
      <div class="skoBox2">
        <span>Mærker</span>
      </div>
      <div class="form-check mrkFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Nike
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Adidas
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Vans
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Puma
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Gucci
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Birkenstock
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          DAY
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          H2O
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Ecco
        </label>
      </div>
  </div>
  <div class="col-xl-9">
    test
  </div>
</section>

<!-------test filter------------>
<div class="container">
    <!-- Filter Controls - Simple Mode -->
    <div class="row">
        <!-- A basic setup of simple mode filter controls, all you have to do is use data-filter="all"
        for an unfiltered gallery and then the values of your categories to filter between them -->
        <ul class="simplefilter">
            Simple filter controls:
            <li class="active" data-filter="all">All</li>
            <li data-filter="1">Cityscape</li>
            <li data-filter="2">Landscape</li>
            <li data-filter="3">Industrial</li>
            <li data-filter="4">Daylight</li>
            <li data-filter="5">Nightscape</li>
        </ul>
    </div>

    <!-- Filter Controls - Multifilter Mode -->
    <div class="row">
        <!-- A basic setup of multifilter controls, when the user toggles a category
        the corresponding items are rendered or hidden -->
        <ul class="multifilter">
            Multifilter controls:
            <li data-multifilter="1">Cityscape</li>
            <li data-multifilter="2">Landscape</li>
            <li data-multifilter="3">Industrial</li>
        </ul>
    </div>

    <!-- Shuffle & Sort Controls -->
    <div class="row">
        <ul class="sortandshuffle">
            Sort &amp; Shuffle controls:
            <!-- Basic shuffle control -->
            <li class="shuffle-btn" data-shuffle>Shuffle</li>
            <!-- Basic sort controls consisting of asc/desc button and a select -->
            <li class="sort-btn active" data-sortAsc>Asc</li>
            <li class="sort-btn" data-sortDesc>Desc</li>
            <select data-sortOrder>
                <option value="domIndex">
                    Position
                </option>
                <option value="sortData">
                    Description
                </option>
            </select>
        </ul>
    </div>

    <!-- Search control -->
    <div class="row search-row">
        Search control:
        <input type="text" class="filtr-search" name="filtr-search" data-search>
    </div>

    <div>
        <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
        attribute, which starts from the value 1 and goes up from there -->
        <div class="filtr-container">
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="1, 5" data-sort="Busy streets">
                <img class="img-responsive" src="assets/img/vans.jpg" alt="sample image">
                <span class="item-desc">Busy Streets</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="2, 5" data-sort="Luminous night">
                <img class="img-responsive" src="assets/img/vans.jpg" alt="sample image">
                <span class="item-desc">Luminous night</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="1, 4" data-sort="City wonders">
                <img class="img-responsive" src="assets/img/vans.jpg" alt="sample image">
                <span class="item-desc">city wonders</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="3" data-sort="In production">
                <img class="img-responsive" src="assets/img/vans.jpg" alt="sample image">
                <span class="item-desc">in production</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="3, 4" data-sort="Industrial site">
                <img class="img-responsive" src="assets/img/vans.jpg" alt="sample image">
                <span class="item-desc">industrial site</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="2, 4" data-sort="Peaceful lake">
                <img class="img-responsive" src="assets/img/vans.jpg" alt="sample image">
                <span class="item-desc">peaceful lake</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="1, 5" data-sort="City lights">
                <img class="img-responsive" src="assets/img/vans.jpg" alt="sample image">
                <span class="item-desc">city lights</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="2, 4" data-sort="Dreamhouse">
                <img class="img-responsive" src="assets/img/vans.jpg" alt="sample image">
                <span class="item-desc">dreamhouse</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="3" data-sort="Restless machines">
                <img class="img-responsive" src="assets/img/vans.jpg" alt="sample image">
                <span class="item-desc">restless machines</span>
            </div>
        </div>
    </div>
</div>
