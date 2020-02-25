<h1 style="text-align: center">Contacts | Favorite contacts</h1>
<div id = container>
    
    <div  id = "block1"> 
        <ul>
            <?php foreach ($contacts as $contact) { ?>
                <li id="<?= $contact['id'] ?>"><?= $contact['contact'] ?></li>
            <?php } ?>
        </ul>
    </div>
<!--////////////-->    
    <div  id = "block2"> 
    </div>
</div> 
<script src="/public/home.js"></script>