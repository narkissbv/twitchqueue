var queue = [];

$( document ).ready(function () {
  fetchQueue();
  setInterval(fetchQueue, 5000);
});

function fetchQueue () {
  queue = [];
  $.ajax({
    method: 'POST',
    url: 'queue.php?method=json',
  }).done(function(resp) {
    queue = JSON.parse(resp);
    buildList();
  });
}

function buildList () {
  const container = document.querySelector('.list-container');
  if (queue.length > 0) {
    const template = document.getElementById('list-item');
    let clone = null;
    container.textContent = '';
    queue.forEach( (item, index) => {
      clone = template.content.cloneNode(true);
      let priority = clone.querySelector('.priority');
      let name = clone.querySelector('.name');
      let up = clone.querySelector('.move-up');
      let down = clone.querySelector('.move-down');
      let deleteElem = clone.querySelector('.delete');
      priority.textContent = index;
      name.textContent = item;

      // add event listeners
      up.addEventListener('click', function () {
        $.ajax({
          method: "POST",
          url: 'moveup.php',
          data: {
            name: item
          }
        }).done( function() {
          fetchQueue();
        });
      })
      down.addEventListener('click', function () {
        $.ajax({
          method: "POST",
          url: 'movedown.php',
          data: {
            name: item
          }
        }).done( function () {
          fetchQueue();
        })
      })
      deleteElem.addEventListener('click', function () {
        $.ajax({
          method: "POST",
          url: 'delete.php',
          data: {
            name: item
          }
        }).done( function () {
          fetchQueue();
        })
      })
      container.appendChild(clone);
    })
  } else {
    container.textContent = '';
  }
}