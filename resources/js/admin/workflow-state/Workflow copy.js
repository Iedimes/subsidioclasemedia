import go from "gojs";

var $ = go.GraphObject.make;

Vue.component("diagram", {
    template: "<div id='myDiagramDiv'></div>", // just a plain DIV
    props: ["modelData", "datos", "datatransitions"], // accept model data as a parameter
    data: function() {
        return {
            arrayData: this.datos,
            arrayLabels: [],
            arrayT: this.datatransitions,
            arrayTransitions: [],
            list: ["lightblue", "orange", "lightgreen", "pink"],
            diagramData: {
                // passed to <diagram> as its modelData
                nodeDataArray: [
                    { key: 1, text: "Alpha", color: "lightblue" },
                    { key: 2, text: "Beta", color: "orange" },
                    { key: 3, text: "Gamma", color: "lightgreen" },
                    { key: 4, text: "Delta", color: "pink" }
                ],
                linkDataArray: [
                    { from: 1, to: 2 },
                    { from: 1, to: 3 },
                    { from: 3, to: 4 }
                ],
                currentNode: null,
                savedModelText: "",
                counter: 1, // used by addNode
                counter2: 4
            }
        };
    },
    mounted: function() {
        const $ = go.GraphObject.make; // for conciseness in defining templates

        this.arrayData.forEach((value, index) => {
            this.arrayLabels.push(this.getLabels(value));
        });

        this.arrayT.forEach((value, index) => {
            this.arrayTransitions.push(this.getTransitions(value));
        });
        console.log(this.arrayTransitions);
        const myDiagram = $(
            go.Diagram,
            "myDiagramDiv", // create a Diagram for the DIV HTML element
            {
                // enable undo & redo
                "undoManager.isEnabled": true
            }
        );

        myDiagram.nodeTemplate = $(
            go.Node,
            "Auto", // the Shape will go around the TextBlock
            $(
                go.Shape,
                "RoundedRectangle",
                { strokeWidth: 0, fill: "white" }, // default fill is white
                // Shape.fill is bound to Node.data.color
                new go.Binding("fill", "color")
            ),
            $(
                go.TextBlock,
                { margin: 8 }, // some room around the text
                // TextBlock.text is bound to Node.data.key
                new go.Binding("text", "key")
            )
        );

        myDiagram.model = new go.GraphLinksModel(
            this.arrayLabels,
            this.arrayTransitions
        );
    },
    watch: {
        modelData: function(val) {
            this.updateModel(val);
        }
    },
    computed: {
        currentNodeText: {
            get: function() {
                var node = this.currentNode;
                if (node instanceof go.Node) {
                    return node.data.text;
                } else {
                    return "";
                }
            },
            set: function(val) {
                var node = this.currentNode;
                if (node instanceof go.Node) {
                    var model = this.model();
                    model.startTransaction();
                    model.setDataProperty(node.data, "text", val);
                    model.commitTransaction("edited text");
                }
            }
        }
    },
    methods: {
        getColor: function() {
            var chosenNumber = Math.floor(Math.random() * this.list.length);
            return this.list[chosenNumber];
        },
        getLabels: function(marker) {
            return {
                key: marker.name,
                color: this.getColor()
            };
        },
        getTransitions: function(marker) {
            return {
                from: marker.from,
                to: marker.to
            };
        },
        model: function() {
            return this.diagram.model;
        },
        updateModel: function(val) {
            // No GoJS transaction permitted when replacing Diagram.model.
            if (val instanceof go.Model) {
                this.diagram.model = val;
            } else {
                var m = new go.GraphLinksModel();
                if (val) {
                    for (var p in val) {
                        m[p] = val[p];
                    }
                }
                this.diagram.model = m;
            }
        },
        updateDiagramFromData: function() {
            this.diagram.startTransaction();
            // This is very general but very inefficient.
            // It would be better to modify the diagramData data by calling
            // Model.setDataProperty or Model.addNodeData, et al.
            this.diagram.updateAllRelationshipsFromData();
            this.diagram.updateAllTargetBindings();
            this.diagram.commitTransaction("updated");
        }
    }
});
