<h1>TTN</h1>
<table id = "ttn_table">
    <tr>
        <th>ttn</th>
        <th>Status</th>
        <th>StatusCode</th>
        <th>ScheduledDeliveryDate</th>
    </tr>
    <tr>
        <td id="ttn"></td>
        <td id="Status"></td>
        <td id="StatusCode"></td>
        <td id="ScheduledDeliveryDate"></td>
    </tr>
</table>
<form class="auth" action="">
    <fieldset>
        <legend>TTN</legend>
        <p><?= $error ? $error : '' ?></p>
        <div class="auth__row">
            <label for="ttn">Users ttn</label>
            <input class="auth__text" type="text" id="userttn" value="">
            <i class="auth__error auth__error_hide">Not valid ttn (14 digits)</i>
        </div>
        <div class="auth__row">
            <button type="button" id="sendbtn" class="auth__btn">Check status</button>
        </div>
    </fieldset>
</form>
<table id = "ttns_table">
    <tr>
        <th>ttn</th>
        <th>Status</th>
        <th>StatusCode</th>
        <th>ScheduledDeliveryDate</th>
    </tr>
    <tr>
        <td id="ttn"></td>
        <td id="Status"></td>
        <td id="StatusCode"></td>
        <td id="ScheduledDeliveryDate"></td>
    </tr>
    <tbody id = "ttns_table_body">
    </tbody>
</table>
<script src="/public/ttn.js"></script>