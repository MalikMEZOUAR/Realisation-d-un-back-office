const tableau_admin = (props) => {
    return (
        <div>
            <table>
                <thead>
                    <tr>
                    <?php 
                    while( $tableau_colonnes= ?>{props.tableau_colonnes}<?php ){?>
						<th><?php echo $tableau_colonnes ?></th>
					<?php }  ?>
                        <th class="pl-8 py-5"></th>
                    </tr>
                </thead>
                <tbody>
                        <tr class="odd:bg-neutral-50  border-b-2 border-b-gray-100 last:border-b-0 first:border-t-2 first:border-t-gray-200 ">
                            <?php
                            while ($liste_element = ?>{props.tableau_lignes}<?php) {
                                while($element = $liste_element[0]){
                                    echo "<td> ". echo $element[0]; ."</td>"
                                }?>
                                <td class="pl-8 p-4">
                                    <a href='<?php echo $lien_edition; ?>' class='font-bold text-blue-600'>Éditer</a>
                                </td>
                            <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>
    );
}
