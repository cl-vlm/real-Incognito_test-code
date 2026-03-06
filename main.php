<?php
include "db.php";
$stmt = $conn->query("SELECT * FROM board ORDER BY num DESC");
$rows = $stmt->fetchAll();
?>
<tbody>
    <?php foreach($rows as $row) { ?>
    <tr>
        <td><?= $row['num'] ?></td>
        <td style="text-align: left;"><a href="view.php?num=<?= $row['num'] ?>"><?= htmlspecialchars($row['title']) ?></a></td>
        <td><?= htmlspecialchars($row['author']) ?></td>
        <td><a href="delete.php?num=<?= $row['num'] ?>" style="color: red;">삭제</a></td>
    </tr>
    <?php } ?>
</tbody>
