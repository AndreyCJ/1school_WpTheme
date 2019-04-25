// Adding an arrow to menu
document.querySelectorAll('.main-menu .menu-item-has-children').forEach(function (e) {
  e.querySelector('li a').innerHTML += '<i class="fas fa-angle-down"></i>';
});

document.querySelectorAll('ul.side-menu .page_item a').forEach(function (e) {
  e.innerHTML = '<i class="fas fa-caret-right"></i>' + e.innerHTML;
});

class scrollOnTop {
  constructor() {
    this.srollOnTopBtn = document.querySelector('a#scrollBtn');
    this.events();
  }

  events() {
    window.addEventListener('scroll', this.scrollOnTopShowBtn.bind(this));
    this.srollOnTopBtn.addEventListener('click', this.scrollOnTop.bind(this));
  }


  scrollOnTopShowBtn () {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
      this.srollOnTopBtn.style.visibility = 'visible';
      this.srollOnTopBtn.style.opacity = '1';
    } else {
      this.srollOnTopBtn.style.opacity = '0';
      this.srollOnTopBtn.style.visibility = 'hidden';
    }
  }

  scrollOnTop () {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0;
  }
}

// mobileSideMenu
class MobileMenu {
  constructor() {
    this.header = document.querySelector('.mobile-header-wrapper');
    this.logo = document.querySelector('.mobile-header .logo');
    this.sideNavOverlay = document.querySelector('#sideNavOverlay');
    this.sticky = this.header.offsetTop;
    this.openButton = document.querySelector('#openSide');
    this.closeButton = document.querySelector('#sideNav #closeSide');
    this.topbarBtn = document.querySelector('.topbar-dropdown-btn');
    this.topbar = document.querySelector('.topbar');
    this.topbarOverlay = document.querySelector('.topbar-menu-overlay');
    this.topbarClose = document.querySelector('.topbar-menu-overlay .close-btn');
    this.events();
    this.main = document.getElementById('main');
    this.sideNav = document.getElementById('sideNav');
    this.mainBody = document.querySelector('.main-body-content');
    this.addArrows = document.querySelectorAll('#sideNav .menu-item-has-children').forEach((e) => {
      e.innerHTML += '<button class="dropDownArrow"><i class="fas fa-angle-down" id="dropArrowIcon"></i></button>'; // <div class="sideNavLine"></div>
    });
    
    this.arrowClickCount = 0;
    
  }

  events() {
    window.addEventListener('scroll', this.mobileOnScroll.bind(this));
    this.openButton.addEventListener('click', this.openSideMenu.bind(this));
    this.closeButton.addEventListener('click', this.closeSideMenu.bind(this));
    this.sideNavOverlay.addEventListener('click', this.closeSideMenu.bind(this));
    document.addEventListener('click', this.openSubMenu.bind(this), false);
    this.topbarBtn.addEventListener('click', this.openTopbarMenu.bind(this));
  }

  openSideMenu() {
    this.sideNav.style.width = '300px';
    this.sideNav.style.padding = '10px';
    this.sideNavOverlay.style.width = '100%';
    this.sideNavOverlay.style.height = '100%';
  }

  closeSideMenu() {
    this.sideNav.style.width = '0px';
    this.sideNav.style.padding = '0px';
    this.sideNavOverlay.style.width = '0';
    this.sideNavOverlay.style.height = '0';
  }

  openSubMenu(e) {
    if (e.target.className == 'dropDownArrow'){
      this.item = e.target.parentElement.querySelector('.sub-menu');
      if(this.item.className != 'sub-menu opened') {
        this.item.classList.add('opened');
      } else {
        this.item.classList.remove('opened');
      }
    } else if (e.target.id == 'dropArrowIcon'){
      this.itemI = e.target.parentElement.parentElement.querySelector('.sub-menu');
      if(this.itemI.className != 'sub-menu opened'){
        this.itemI.classList.add('opened');
      } else {
        this.itemI.classList.remove('opened');
      }
    }
  }


  mobileOnScroll() {
    if(window.innerWidth <= 1030) {
      if (window.pageYOffset  > this.topbar.offsetHeight) {
        this.header.classList.add("sticky");
        this.mainBody.style.paddingTop = `${this.header.offsetHeight}px`;
        this.logo.style.transform = 'scale(0.91)';
      } else {
        this.header.classList.remove("sticky");
        this.mainBody.style.paddingTop = '0px';
        this.logo.style.transform = 'scale(1)';
      }
    }
  }

  openTopbarMenu() {
    this.topbarClose.addEventListener('click', this.closeTopbarMenu.bind(this));

    this.topbarOverlay.style.display = 'block';
  }

  closeTopbarMenu() {
    this.topbarOverlay.style.display = 'none';
  }


}


// SEARCH
class Search {
  // 1. Descrube create/initiate our object
  constructor() {
    this.addSearchHTML();
    this.openButton = document.querySelector('.search-box a');
    this.openMobileButton = document.querySelector('.menu-buttons .search-box a');
    this.closeButton = document.querySelector('.search-overlay .close-i');
    this.searchOverlay = document.querySelector('.search-overlay');
    this.input = document.querySelector('.search-overlay .search-term');
    this.resultsDiv = document.querySelector('.overlay-content');
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
    
  }

  // 2. events
  events() {
    this.openButton.addEventListener('click', this.openOverlay.bind(this), false);
    this.openMobileButton.addEventListener('click', this.openOverlay.bind(this), false);
    this.closeButton.addEventListener('click', this.closeOverlay.bind(this), false);
    document.addEventListener('keydown', this.keyPress.bind(this), false);
    this.input.addEventListener('keyup', this.typingLogic.bind(this), false);
  }

  // 3. methods (function, action....)
  typingLogic() {
    if (this.input.value != this.previousValue) {
      clearTimeout(this.typingTimer);
      if (this.input.value != '') {
        if (this.isSpinnerVisible == false) {
          this.resultsDiv.innerHTML = '<div class="loader-container"><div class="loader"></div>';
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 1000);
      } else {
        this.resultsDiv.innerHTML = '';
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.input.value;
  }

  async getResults() {
    let thePages = await this.httpGet(`${schoolData.root_url}/wp-json/wp/v2/pages?search=${this.input.value}`);
    let thePosts = await this.httpGet(`${schoolData.root_url}/wp-json/wp/v2/posts?search=${this.input.value}`);

    return this.createResults(JSON.parse(thePosts), JSON.parse(thePages));
  }

  createResults(posts, pages) {
    this.resultsDiv.innerHTML = `
      <span class="search-content-title">Новости :</span>
      ${posts.length > 0 ? '<ul class="search-content-links">' : '<p class="err">Нет подходящих результатов</p>' }
      ${posts.map(i => `<li><a href="${i.link}">${i.title.rendered}</a></li>`).join('')}
      ${posts.length > 0 ? '</ul>' : ''}

      <span class="search-content-title">Страницы :</span>
      ${pages.length > 0 ? '<ul class="search-content-links">' : '<p class="err">Нет подходящих результатов</p>' }
      ${pages.map(i => `<li><a href="${i.link}">${i.title.rendered}</a></li>`).join('')}
      ${pages.length > 0 ? '</ul>' : ''}
    `;
        
    return this.isSpinnerVisible = false;
  }



  keyPress(e) {
    if (e.keyCode == 27 && this.isOverlayOpen == true) {
      this.closeOverlay();
      this.isOverlayOpen = false;
    }
  }

  openOverlay(e) {
    this.searchOverlay.style.visibility = 'visible';
    this.searchOverlay.style.opacity = '1';
    document.querySelector('body').classList.add('no-scroll');
    this.input.value = '';
    this.input.focus();
    this.isOverlayOpen = true;
    return e.preventDefault();
  }

  closeOverlay() {
    this.searchOverlay.style.visibility = 'hidden';
    this.searchOverlay.style.opacity = '0';
    document.querySelector('body').classList.remove('no-scroll');
  }

  httpGet(url) {

    return new Promise(function(resolve, reject) {
  
      var xhr = new XMLHttpRequest();
      xhr.open('GET', url, true);
  
      xhr.onload = function() {
        if (this.status == 200) {
          resolve(this.response);
        } else {
          var error = new Error(this.statusText);
          error.code = this.status;
          reject(error);
        }
      }
  
      xhr.onerror = function() {
        reject(new Error("Network Error"));
      };
  
      xhr.send();
    });
  
  }

  addSearchHTML() {
    document.querySelector('footer').innerHTML += `
    <div class="search-overlay">
      <div class="overlay-container">
        <input type="text" class="search-term" placeholder="Найти...">
        <i class="fa fa-window-close close-i" aria-hidden="true"></i>
      </div>
      <div class="overlay-content"></div>
    </div>
    `;
  }

}

let mobileMenu = new MobileMenu();
let search = new Search();
let scrollontop = new scrollOnTop();