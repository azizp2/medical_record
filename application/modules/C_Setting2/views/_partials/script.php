<script>
    // sw_alert("test", "test", "success")

    loadMenu();



    $(".userLogin").on("click", function() {
        loadUsers()
    });

    $(".groupUsers").on("click", function() {
        loadGroup()
    });

    $(".menuManagement").on("click", function() {
        loadMenu()
    });


    function loadUsers() {
        $("#loadListOfUsers").html("<?php foreach ($listOfUsers as $val) : ?><tr>\n\
            <td><?= ucwords($val->userid) ?></td>\n\
            <td><?= ucwords($val->firstname) . " " . ucwords($val->lastname)  ?></td>\n\
            <td><?= ucwords($val->position_name) ?></td>\n\
            <td><?= ucwords($val->user_group_name) ?></td>\n\
            <td><?= $val->mobilenumber ?></td>\n\
            <td><?= $val->factory_name ?></td>\n\
            <td><button class='btn btn-primary btn-sm waves-effect waves-light'><span class='fa fa-edit'></span></button> <button class='btn btn-danger btn-sm waves-effect waves-light'><span class='fa fa-trash'></span></button>\n\</td>\n\
            </tr>\n\
            <?php endforeach ?>\n\
        ");

        $("#tableOfUsers").show();
        $("#tableOfGroupUsers").hide();
        $("#tableOfMenuMangement").hide();


    }

    function loadGroup() {
        $("#loadListOfGroup").html("<?php foreach ($listOfGroup as $val) : ?>\n\
            <tr>\n\
                <td class='nowrap style='width: 10px;'><?= ucwords($val->user_group_id) ?></td>\n\
                <td class='nowrap style='width: 100px;'><?= ucwords($val->user_group_name) ?></td>\n\
                <td class='nowrap style='width: 20px;'><?= ucwords($val->user_group_remark) ?></td>\n\
                <td class='nowrap style='width: 50px;'><?= $val->not_active == 0 ? "<span class='badge badge-danger'>Active</span>" : "<span class='badge badge-danger'>Not Active</span>" ?></td>\n\
                <td class='nowrap style='width: 10px;'><?= $val->created_by ?></td>\n\
                <td class='nowrap style='width: 10px;'><?= $val->updated_by ?></td>\n\
                <td class='nowrap style='width: 10px;'><button class='btn btn-primary btn-sm waves-effect waves-light'><span class='fa fa-edit'></span></button> <button class='btn btn-danger btn-sm waves-effect waves-light'><span class='fa fa-trash'></span></button>\n\</td>\n\
            </tr>\n\
            <?php endforeach ?>\n\
        ");

        $("#tableOfGroupUsers").show();
        $("#tableOfUsers").hide();
        $("#tableOfMenuMangement").hide();
    }

    function loadMenu() {

        $("#loadMenuList").html("<ol class='dd-list'>\n\
                                    <?php foreach ($listOfMenu as $val) : ?>\n\
                                        <li class='dd-item' data-id='2' style='position: 'sticky'; top:'0px'; background-color: 'white'>\n\
                                            <div class='dd-handle'><?= $val['hdrId'] . " - " . $val['title'] ?></div>\n\
                                            <ol class='dd-list'>\n\
                                                <?php foreach ($val['menuLevel2'] as $levl2) : ?>\n\
                                                <li class='dd-item' data-id='3'>\n\
                                                    <div class='dd-handle'><?= $levl2['subMenuId'] . " - " . $levl2['subMenuTitle'] ?></div>\n\
                                                    <ol class='dd-list'>\n\
                                                    <?php foreach ($levl2['menuLevel3'] as $lvl3) : ?>\n\
                                                        <li class='dd-item' data-id='6'>\n\
                                                            <div class='dd-handle'><?= $lvl3['dtlTitle'] ?></div>\n\
                                                        </li>\n\
                                                        <?php endforeach ?>\n\
                                                    </ol>\n\
                                                </li>\n\
                                                <?php endforeach ?>\n\
                                            </ol>\n\
                                        </li>\n\
                                        <?php endforeach ?>\n\
                                    </ol>");

        $("#tableOfMenuMangement").show();
        $("#tableOfGroupUsers").hide();
        $("#tableOfUsers").hide();

    }
</script>