import { Component, EventEmitter, Input, Output } from '@angular/core';
import { Link } from 'src/app/interfaces/link';

@Component({
  selector: 'app-pagination',
  templateUrl: './pagination.component.html',
  styleUrls: ['./pagination.component.css']
})
export class PaginationComponent {

  @Input() links : Link[] = [];
  @Output() page = new EventEmitter<string>();

  otherPage(link : Link)
  {
    // console.log(link.url?.split("=")[1]);
    this.page.emit(link.url?.split("=")[1])
    
  }


}
