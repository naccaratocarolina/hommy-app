import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { AuthService } from "../services/auth.service";
import { IonicStorageModule } from "@ionic/storage";

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  //declarando a variavel do tipo form builder
  login_form: FormGroup;

  constructor( public authService: AuthService, public formbuilder: FormBuilder, public router: Router ) {
    //inicializando o form e validando seus campos
    this.login_form = this.formbuilder.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(8)]]
    });
  }

  ngOnInit() {
  }

  login(login_form) {
    if (login_form.status == "VALID") { //se os dados preenchidos do form passarem no validador
      this.authService.postLogin(login_form.value).subscribe((res) => {
        console.log(res);
        //salva token, name e email no localStorage
        //n esquecer de nunca salvar o password no storage haha
        localStorage.setItem('token', res.data.token);
        localStorage.setItem('user_name', res.data.user.name);
        localStorage.setItem('user_email', res.data.user.email);
        //apos o registro, navega para a home
        this.router.navigate(['/home2']);
      });
    }
  }

}
