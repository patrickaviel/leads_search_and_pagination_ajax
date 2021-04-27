<?php   foreach ($leads as $lead)    {  ?>
                <tr>
                    <th scope="row"><?= $lead['leads_id'] ?></th>
                    <td><?= $lead['first_name'] ?></td>
                    <td><?= $lead['last_name'] ?></td>
                    <td><?= $lead['registered_datetime'] ?></td>
                    <td><?= $lead['email'] ?></td>
                </tr>
<?php   }                               ?>