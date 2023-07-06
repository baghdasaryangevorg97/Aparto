export const searchTypes = [
  {
    id: 1,
    value: "With Result",
  },
  {
    id: 2,
    value: "No Result",
  },
];

export const searches = [
  {
    address: "opera baxramyan kaskad araratin nayi kofe dni achqs shoyi",
    result: "5 Results",
    date: "May 17 2023",
  },
  {
    address: "opera baxramyan kaskad araratin nayi kofe dni achqs shoyi",
    result: "No Result",
    date: "Aug 28 2023",
  },
  {
    address: "opera baxramyan kaskad araratin nayi kofe dni achqs shoyi",
    result: "18 Results",
    date: "Apr 17 2023",
  },
];

export const searchColumns = [
  {
    name: "Որոնում",
    sortable: true,
    selector:  row => row.result,
    cell: (row) => <p className="columFontSize">{row.address}</p>,
  },
  {
    name: "Արդյունք",
    cell: (row) => <p className="columFontSize">{row.result}</p>,
    width: "250px",
  },
  {
    name: "Ամսաթիվ",
    cell: (row) => <p className="columFontSize">{row.date}</p>,
    width: "170px",
  },
];
