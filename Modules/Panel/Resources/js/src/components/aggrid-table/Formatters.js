export const dateFormatter=(params)=>{
    console.log(window.Iracode.$i18n)
    const colDef={...params.colDef};
    const data={...params.data};
    const localedParam=`${colDef.field}_${window.Iracode.$i18n.locale}`;
    if(!data[localedParam]) return params.value;
    return data[localedParam];
}
export const relationFormatter=(params)=>{
    //get data using dot notation, like a.b
    const data={...params.colDef};
    const value=Iracode.getByDotNotation(params.data,data.field,"-");
    return Iracode.t(value);
}
export const radioFormatter=(params)=>{
    let field=params.context.componentParent.fields[params.colDef.field];
    let value=params.value;
    value= typeof value == "boolean" ? +value:value;
    if(field && field.options){
        return Iracode.t(field.options[value]) ? Iracode.t(field.options[value]):Iracode.t(value);
    }
    return Iracode.t(value);
}
export const checkboxFormatter=(params)=>{
    let value=params.value;
    value= typeof value == "boolean" ? +value:value;
    return Iracode.t(value);
}
export const selectFormatter=(params)=>{
    let field=params.context.componentParent.fields[params.colDef.field];
    if(!field) return value;
    let value=params.value;
    value= typeof value == "boolean" ? +value:value;
    if(field && field.options && Object.keys(field.options).length){
        return field.options[value] ? Iracode.t(field.options[value]):Iracode.t(value);
    }
    return Iracode.t(value);
}
export const rowNumberFormatter=(params)=>{
    return params.value + ((params.context.componentParent.paginationData.currentPage-1) * params.context.componentParent.paginationData.limit);
}
export const localeFormatter=(params)=>{
    return params.value
    ? params.value[Iracode.$i18n.locale]
    : params.value;
}
export default{
    localeFormatter,
    selectFormatter,
    rowNumberFormatter,
    radioFormatter,
    checkboxFormatter,
    relationFormatter,
    dateFormatter
}
