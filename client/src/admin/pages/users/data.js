import { Link } from "react-router-dom";
import { admin, agent, moderator } from "../../svgs/svgs";
import { capitalize } from "../../../helpers/formatters";

export const userAdminColumns = [
  {
    name: "Անուն",
    cell: (row) => <p className="columFontSize">{row.full_name.en}</p>,
    sortable: true,
    selector: (row) => row.full_name.en,
  },
  {
    name: "էլ․ հասցե",
    cell: (row) => <p className="columFontSize">{row.email}</p>,
    sortable: true,
    selector: (row) => row.email,
  },
  {
    name: "Հեռ․ համար",
    cell: (row) => <p className="columFontSize">{row.phone?.tel1}</p>,
  },
  {
    name: "Հաստիք",
    cell: (row) => {
      return (
        <p className="users__table-role">
          {row.role === "admin"
            ? admin.icon
            : row.role === "agent"
            ? agent.icon
            : moderator.icon}
          {capitalize(row.role)}
        </p>
      );
    },
  },
  {
    name: "Կարգավիճակ",
    cell: (row) => (
      <p className="columFontSize">
        {row.status === "approved" ? "Ակտիվ" : "Ոչ ակտիվ"}
      </p>
    ),
  },
  {
    name: "",
    key: "action",
    text: "Action",
    cell: (row) => {
      return (
        <Link to={`edit/${row.id}`} className="users__table-link columnDelete">
          Փոխել
        </Link>
      );
    },
  },
];

export const userCustomColumns = [
  {
    name: "Անուն",
    cell: (row) => <p className="columFontSize">{row.full_name.en}</p>,
    sortable: true,
    selector: (row) => row.email,
  },
  {
    name: "էլ․ հասցե",
    cell: (row) => <p className="columFontSize">{row.email}</p>,
    sortable: true,
    selector: (row) => row.email,
  },
  {
    name: "Հեռ․ համար",
    cell: (row) => <p className="columFontSize">{row.phone?.tel1}</p>,
  },
  {
    name: "Հաստիք",
    cell: (row) => {
      return (
        <p className="users__table-role">
          {row.role === "admin"
            ? admin.icon
            : row.role === "agent"
            ? agent.icon
            : moderator.icon}
          {capitalize(row.role)}
        </p>
      );
    },
  },
];

export const addUserInputs = [
  {
    id: "user_name_am",
    type: "text",
    placeholder: "Գրեք անուն ազգանուն",
    name: "Անուն",
  },
  {
    id: "user_name_ru",
    type: "text",
    placeholder: "Գրեք անուն ազգանուն",
    name: "Անուն RUS",
  },
  {
    id: "user_name_en",
    type: "text",
    placeholder: "Գրեք անուն ազգանուն",
    name: "Անուն ENG",
  },
  {
    id: "user_mail",
    type: "email",
    placeholder: "Գրեք էլ․ հասցե",
    name: "էլ․ հասցե",
  },
];
