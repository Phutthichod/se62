class Accessories{
    list_access = []
    addAccess(accessories){
        let has = false
        let list
        for(let i in this.list_access){
            if(this.list_access[i].id == accessories.id)
                {
                    has = true
                    list = this.list_access[i]
                    break
                }
        }
        if(!has){
            this.list_access.push(accessories)
        }else{
            list.number++
        }

    }
    getListAccess(){
        return this.list_access;
    }
}
