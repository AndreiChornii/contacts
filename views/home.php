<h1 style="text-align: center">Contacts | Favorite</h1>
<div id = container>
    
    <div  id = "block1"> 
        <ul>
            <?php foreach ($contacts as $contact) { ?>
                <li id="<?= $contact['id'] ?>"><?= $contact['Contact'] ?></li>
            <?php } ?>
        </ul>
    </div>
<!--////////////-->    
    <div  id = "block2"> 
        <ul>
            <?php foreach ($contacts_list as $contact) { ?>
                <li id="<?= $contact['id'] ?>"><?= $contact['Contact'] ?></li>
            <?php } ?>
        </ul>
    </div>
</div> 
<script src="/public/home.js"></script>