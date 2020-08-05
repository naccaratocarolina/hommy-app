import { Component, OnInit } from '@angular/core';
import { Platform } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss']
})
export class AppComponent implements OnInit {
  public selectedIndex = 0;
  public appPages = [
    {
      title: 'Home',
      url: '/home2',
      icon: 'home'
    },
    {
      title: 'Minha conta',
      url: '/home2',
      icon: 'person'
    },
    {
      title: 'Favoritas',
      url: '/favorites',
      icon: 'heart'
    },
    {
      title: 'Pesquisar',
      url: '/home2',
      icon: 'search'
    },
    {
      title: 'Deletar conta',
      url: '/home2',
      icon: 'trash'
    },
    {
      title: 'Sair',
      url: '/home2',
      icon: 'exit'
    }
  ];
  public options = ['Recomendados', 'Casas', 'Apartamentos', 'Quartos', 'Arquivados'];

  constructor(
    private platform: Platform,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar
  ) {
    this.initializeApp();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }

  ngOnInit() {
    const path = window.location.pathname.split('folder/')[1];
    if (path !== undefined) {
      this.selectedIndex = this.appPages.findIndex(page => page.title.toLowerCase() === path.toLowerCase());
    }
  }
}
