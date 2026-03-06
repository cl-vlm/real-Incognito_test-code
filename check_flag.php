<?php
// 이 파일은 화면에 아무것도 안 뜨고 오직 텍스트만 뱉어야 합니다.
if(isset($_GET['key']) && strpos($_GET['key'], 'getSuccess') !== false) {
    echo "DS{DOM_CL0BB3RING_HIDD3N_SUCC3SS}";
} else {
    echo "fail";
}
?>