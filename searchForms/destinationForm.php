<form class="bs-example"  method="post"  id="citySearhForm">
      <div class="form-group">
        <label class="control-label">Destiantion</label>
        <div class="controls">
          <input type="hidden" name="action"  value="getByRegion"/>
          <input type="hidden" name="destinationId"  value=""/>
          <input type="text" name="search" placeholder="Enter City Or Destiantion" class="form-control" id="searchByDestination" autocomplete="off" value=""/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label">Arrival Date</label>
        <div class="controls">
          <input type="text" class="form-control" placeholder="Arrival Date" name="arrivalDate" id="arrivalDate">
        </div>
      </div>

        <div class="form-group">
            <label class="control-label">Departure Date</label>
            <div class="controls">
              <input type="text" class="form-control" placeholder="Departure Date" name="departureDate" id="departureDate">
            </div>
            <label class="control-label">Rooms</label>

            <div class="controls">
            <?php
                $websiteAPI->generateSelectList('RoomOptions_roomNumbers',1, 10);
            ?>
            </div>
        </div>

        <div id="adultChildContainer" class="form-group" >
            <div class="form-group RoomOptions_roomObj" id="room1" >
                <label class="control-label">Adults</label>
                <?php
                    $websiteAPI->generateSelectList('room1_adults',1, 10,'RoomOptions_adults');
                ?>
                <label class="control-label">Childrens</label>
                <?php
                    $websiteAPI->generateSelectList('room1_childs',0, 6,'RoomOptions_childs');
                ?>
              </div>
        </div>


      <div class="form-group">
        <div class="controls">
          <button type="submit" class="btn btn-default" name="submit" id="searchHotels">Search </button>
        </div>
      </div>

</form>