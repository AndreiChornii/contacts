<h1>Contacts</h1>
        
<table>
    <tr>
        <th>Contact_name</th>
    </tr>
    
    <?php foreach($contacts_list as $contact) { ?>
    <tr>
        <td><?= $contact['Contact']?></td>
    </tr>
    <?php } ?>
    
</table>