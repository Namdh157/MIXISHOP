<?php
  
?>
<script>
// home page
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($label, JSON_UNESCAPED_UNICODE) ?>,
      datasets: [{
        label: 'Thống kê về loại sản phẩm',
        data: <?php echo json_encode($datas, JSON_UNESCAPED_UNICODE) ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
});

const modal = document.querySelector('.modal');
const btnModal = document.querySelector('.modal .modal-dialog button.btn');
btnModal.onclick = function() {
  modal.style.display = 'none';
}
</script>