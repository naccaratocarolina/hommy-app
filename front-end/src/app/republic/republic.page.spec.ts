import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { RepublicPage } from './republic.page';

describe('RepublicPage', () => {
  let component: RepublicPage;
  let fixture: ComponentFixture<RepublicPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RepublicPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(RepublicPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
