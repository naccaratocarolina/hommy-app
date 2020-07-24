import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { FavoritasPage } from './favoritas.page';

describe('FavoritasPage', () => {
  let component: FavoritasPage;
  let fixture: ComponentFixture<FavoritasPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FavoritasPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(FavoritasPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
