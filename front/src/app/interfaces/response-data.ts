import { Link } from "./link";

export interface ResponseData<T> {

    message : string,
    data : T[],
    status : boolean,
    links ?:  Link[] 
}
