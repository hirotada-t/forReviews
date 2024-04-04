const iconSlider = new Splide("#iconSlider", {
  type: "loop",
  arrows: false,
  pagination: false,
  drag: false,
  focus: "center",
  perPage: 10,
  breakpoints: {
    768: {
      perPage: 4,
    },
  },
  autoScroll: {
    speed: 0.5,
    pauseOnHover: false,
  },
});
iconSlider.mount(window.splide.Extensions);

document.addEventListener('DOMContentLoaded', function() {
    var accordionBtn = document.querySelector('.js__accordionBtn');
    var accordionLabel = document.querySelector('label[for="accordionBtn"]');

    accordionBtn.addEventListener('change', function() {
        if (this.checked) {
            accordionLabel.textContent = '閉じる';
        } else {
            accordionLabel.textContent = '続きを見る';
        }
    });
});


        // 昇順ボタンにクリックイベントを追加
        var ascendingButton = document.querySelector('.ascendingButton');
        ascendingButton.addEventListener('click', function() {
            sortTable(true);
        });

        // 降順ボタンにクリックイベントを追加
        var descendingButton = document.querySelector('.descendingButton');
        descendingButton.addEventListener('click', function() {
            sortTable(false);
        });

        // 表を並び替える関数
        function sortTable(ascending) {
            // 表のスタイルをクリア
            var allTabContents = document.querySelectorAll('.tab_contents');
            allTabContents.forEach(function(tabContents) {
                tabContents.classList.remove('highlight');
            });

            // 各.tab_select要素について処理
            var tabSelects = document.querySelectorAll('.tab_select');
            tabSelects.forEach(function(tabSelect) {
                // 一番上の.tab_contents要素にスタイルを付与
                var firstTabContents = tabSelect.querySelector('.tab_contents');
                firstTabContents.classList.add('highlight');
            });
        }
        
        
          // ナビゲーションリンクにイベントリスナーを追加
  document.querySelectorAll('a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      // クリックされたリンクのhref属性の値を取得
      const targetId = this.getAttribute('href');

      // href属性の値に対応する要素を取得
      const targetElement = document.querySelector(targetId);

      // 対応する要素が存在する場合、その要素までスムーススクロールする
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });