export class FlowItem {
    id;
    name;
    icon;
    data;

    getData() {
        return this.data;
    }

    setData(data) {
        this.data = data;
    }
}
