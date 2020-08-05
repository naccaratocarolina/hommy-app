import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../services/auth.service';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.page.html',
  styleUrls: ['./profile.page.scss'],
})
export class ProfilePage implements OnInit {
  constructor( public authService: AuthService, private router: Router) { }

  ngOnInit() { }

  logout() {
    this.authService.postLogout().subscribe((res) => {
      console.log(res);
      localStorage.removeItem('token');
      this.router.navigate(['/home2']);
    });
  }

}
