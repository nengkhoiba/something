<table id="role-table" class="table table-striped table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-type="numeric">ID</th>
                                    <th data-column-id="sender">Role</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                </tr>
                            </thead>
                             <tbody>
						        <?php  foreach ( $result as $row) { ?>
						            <tr>
						                <td><?php echo $row['ID'];?></td>
										<td><?php echo $row['Role'];?></td>
									</tr>
						        <?php } ?>
						     </tbody>
                        </table>