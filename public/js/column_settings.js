let settings = {
        columns: {
            away_team: {column_color: "", cell_color: "", width: "86"},
            away_team_draw_no_bet: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            neutral_stadium: {column_color: "", cell_color: "", width: "25"},
            away_team_over_0_5_goals: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            away_team_over_1_5_goals: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            away_team_over_2_5_goals: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            away_team_percent_away_success_rate: {column_color: "", cell_color: "", width: "33"},
            away_team_percent_over_2_5_goals: {column_color: "", cell_color: "", width: "33"},
            away_team_percent_total_success_rate: {column_color: "", cell_color: "", width: "33"},
            away_team_to_win: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            away_team_win_or_draw: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            both_teams_to_score: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            country: {column_color: "", cell_color: "", width: "33"},
            date: {column_color: "", cell_color: "", width: "66"},
            division: {column_color: "", cell_color: "", width: "33"},
            draw: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            eliminations: {column_color: "", cell_color: "", width: "33"},
            full_time_result_f: {column_color: "", cell_color: "", width: "21"},
            full_time_result_t: {column_color: "", cell_color: "", width: "21"},
            half_time_result_h: {column_color: "", cell_color: "", width: "21"},
            half_time_result_t: {column_color: "", cell_color: "", width: "21"},
            home_team: {column_color: "", cell_color: "", width: "86"},
            home_team_draw_no_bet: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            home_team_or_away_team_win: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            home_team_over_0_5_goals: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            home_team_over_1_5_goals: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            home_team_over_2_5_goals: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            home_team_percent_home_success_rate: {column_color: "", cell_color: "", width: "33"},
            home_team_percent_over_2_5_goals: {column_color: "", cell_color: "", width: "33"},
            home_team_percent_total_success_rate: {column_color: "", cell_color: "", width: "33"},
            home_team_to_win: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            home_team_win_or_draw: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            id: {column_color: "", cell_color: "", width: "33"},
            play_offs: {column_color: "", cell_color: "", width: "33"},
            season: {column_color: "", cell_color: "", width: "33"},
            stage: {column_color: "", cell_color: "", width: "33"},
            time: {column_color: "", cell_color: "", width: "41"},
            total_goals_over_0_5: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            total_goals_over_1_5: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            total_goals_over_2_5: {column_color: "", cell_color: "", width: "33", skip_filter: true},
            total_goals_over_3_5: {column_color: "", cell_color: "", width: "33", skip_filter: true},
        },
        filters: [
            [22, 23, 24, 25, 26, 27, 28, 29, 31, 32, 34, 35, 37, 38, 39, 40],        //1
            [22, 23, 24, 25, 26, 27, 28, 29, 30, 32, 33, 35, 37, 38, 39, 40],        //2
            [22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 33, 34, 37, 38, 39, 40],        //3
            [22, 24, 30, 31, 32,33, 34, 35, 38, 39, 40],                                //4
            [22, 24, 30, 31, 32,33, 34, 35, 37, 39, 40],                                //5
            [22, 24, 30, 31, 32,33, 34, 35, 37, 38, 40],                                //6
            [22, 24, 30, 31, 32,33, 34, 35, 37, 38, 39],                                //7
            [28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40],                    //8
            [28, 29, 30, 31, 32, 33, 34, 35, 36, 38, 39, 40],                        //9
            [28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 39, 40],                        //10
            [28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 40],                        //11
            [28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39],                        //12
            [30, 31, 32, 33, 34, 35, 36],                                            //13
            [22, 28, 29, 30, 31, 32, 40],                                            //14
            [24, 28, 29, 33, 34, 35, 40],                                            //15
            [22, 23, 24, 25, 26, 27],                                                //16
            [25, 26, 27, 28, 29],                                                    //17
            [36, 37, 38, 39, 40],                                                    //18
            [12, 36, 37, 38, 40],                                                    //19
            [17, 36, 37, 38, 40]                                                     //20
        ],
        orders:
            [
                [ //Колони 3, 4, 1, 2, 12, 17
                    3, 4, 1, 2, 12, 17
                ],
                [ //Колони 23, 22, 24, 25, 26, 27, 28, 29. 30, 31, 32, 33, 34, 35, 36, 37, 38,39,40
                    23, 22, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40
                ]
            ]
    }
;